<?php

namespace backend\controllers;

use Yii;
use backend\models\notas;
use backend\models\NotasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\Metodos;
use backend\controllers\TagsController;

/**
 * NotasController implements the CRUD actions for notas model.
 */
class NotasController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all notas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NotasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single notas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

     public function actionUrl()
    {
        //Subiendo archivo desde el CKEditor
        $uploadedFile = UploadedFile::getInstanceByName('upload'); 
        $mime = \yii\helpers\FileHelper::getMimeType($uploadedFile->tempName);
        $file = $uploadedFile->name;
        
        //creamos los directorios para el dia
        $this->crearDirectorios();
        
        $hash = substr(time(), -5);
        $url = Yii::$app->urlManager->createAbsoluteUrl('images/'.date('Y').'/'.date('m-F').'/'.date('d').'/'.$hash."-".$file);
        $url = str_replace('index.php', '',$url);
        $uploadPath = Yii::getAlias('@webroot').       '/images/'.date('Y').'/'.date('m-F').'/'.date('d').'/'.$hash."-".$file;
        //extensive suitability check before doing anything with the file…
        
        $type = (array)$uploadedFile;
      
        if ($uploadedFile==null)
        {
           $message = "Archivo no subido.";
        }
        else if ($uploadedFile->size == 0)
        { 
           $message = "El archivo es de longitud cero.";
        }
        else if  ($type['type']!="image/jpeg" && $type['type']!="image/png")
        {
           $message = "La imagen debe estar en formato JPG o PNG. Por favor, sube un archivo JPG o PNG en su lugar.";
        }
        else if ($uploadedFile->tempName==null)
        {
           $message = "Error, intento de hackeo al sitio.";
        }
        else {
          $message = "";
          $move = $uploadedFile->saveAs($uploadPath);
          if(!$move)
          {
             $message = "Error al mover el archivo subido. Compruebe la secuencia de comandos se concede permisos de lectura / escritura / Modificar.";
          } 
        }
        $funcNum = $_GET['CKEditorFuncNum'] ;
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";        
    } 
    
    /**
     * Creates a new notas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new notas();
        
        if ($model->load(Yii::$app->request->post())) {
            
            $file = UploadedFile::getInstance($model, 'file');
            if($file!==null){
             
                //creamos los directorios para el dia
                $this->crearDirectorios();        
                $hash = substr(time(), -5);
                
                $file->saveAs('images/'.date('Y').'/'.date('m-F').'/'.date('d').'/'.$hash."-".$file);
                $model->imagen = '/images/'.date('Y').'/'.date('m-F').'/'.date('d').'/'.$hash."-".$file;
            }
                $model->user_id = Yii::$app->user->identity->id;
                $model->fecha = Metodos::getDateTime($model->fecha, 'db');
                $model->visitas = 0;
                $model->me_gusta = 0;
                $model->adjuntos = "";
                $model->destacado = 0;
                $model->remarcado = 0;  
                    
                if($model->save()) {
                    if(Yii::$app->request->post('tags')!== NULL) 
                    { $this->crearTags(Yii::$app->request->post('tags'),$model->id_nota); }
                return $this->redirect('index');
                } else {
                   return $this->render('create', [
                       'model' => $model,
                ]);}
            } else {
                    return $this->render('create', [
                        'model' => $model,
                 ]);}
           
      
    }

    /**
     * Updates an existing notas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'file');
            if($file!==null){
                //hasheo el nombre y tomo las ultimos 5 caracteres
                $hash = substr(hash('ripemd160', $file->name.$model->titulo), -5);
                $file->saveAs('images/'.$hash."-".$file->name);
                $model->imagen = 'images/'.$hash."-".$file->name;
            }
            $model->fecha = Metodos::getDateTime($model->fecha, 'db');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_nota]);
        } else {
            $model->file = $model->imagen;
            $model->fecha = Metodos::getDateTime($model->fecha, 'show');
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing notas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    function crearDirectorios(){
        //creamos los directorios para el dia
        $this->checkDirectorio('images/'.date('Y'));
        $this->checkDirectorio('images/'.date('Y').'/'.date('m-F'));
        $this->checkDirectorio('images/'.date('Y').'/'.date('m-F').'/'.date('d'));
    }//creamos los directorios para el dia
    
    function crearTags($tags, $id_nota){
        TagsController::crearTagsFromArray(explode(',', $tags), $id_nota);        
    }
    
    function checkDirectorio($dir){         
        if (!file_exists($dir) && !is_dir($dir)) {
            mkdir($dir);   
        } 
    }
    
    /**
     * Finds the notas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return notas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = notas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
