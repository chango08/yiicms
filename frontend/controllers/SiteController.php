<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
//use frontend\models\PasswordResetRequestForm;
//use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
//use yii\base\InvalidParamException;
//use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use backend\models\Notas;
use backend\models\Categorias;
use backend\models\Tags;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model = Notas::getNotas(null,'notas');
        foreach($model as $objeto) {
            $objeto['texto'] = substr(strip_tags($objeto['texto']), 0,170)." ..."  ;           
        }
        $noti = Notas::getNotas(null,'noticias');
        foreach($noti as $objeto) {
            $objeto['texto'] = substr(strip_tags($objeto['texto']), 0,100)." ..."  ;           
        }
        $tags = Tags::getTags();
        return $this->render('index',[
            'model'=>$model,
            'tags'=>$tags,
            'noti'=>$noti]);
    }
    
     public function actionCategoria($id=null)
    {
        $model = Notas::getNotas($id,null);
        $pagination = new Pagination([
        'defaultPageSize' => 10,
        'totalCount' => $model->count()
        ]);

        if($model->count()<1) {return $this->redirect('site/error',302);}
        $modelo = $model
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        
        $nombre = $id == null ? "Todas" : Categorias::findOne($id)->nombre;
        return $this->render('articulos',['model'=>$modelo,'pagination' => $pagination,'texto'=>'Categoría: '. $nombre]); 
    }
     public function actionArticulo($id=null)
    {
        $model = Notas::findOne($id);        
        if($model==null) {return $this->redirect('site/error',302);}
        
        $cat = Categorias::findOne($model->categorias_id_categoria);
        $tags = Tags::getTagsByNota($id);
        return $this->render('articulo',['model'=>$model,'tags' => $tags,'cat'=>$cat]); 
    }
    
    
     public function actionTags($id)
    {
        $model = Notas::getNotasbyTag($id);
        $pagination = new Pagination([
        'defaultPageSize' => 10,
        'totalCount' => $model->count()
        ]);

        $modelo = $model
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        
        return $this->render('articulos',['model'=>$modelo,'pagination' => $pagination,'texto'=>'Tag: '. $id]); 
    }


    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Enviado exitosamente. Gracias por su mensaje.');
            } else {
                Yii::$app->session->setFlash('error', 'Error al enviar el email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionBuscar()
    {
        if (Yii::$app->request->post()) {
            if(Yii::$app->request->post("buscar")!== "" ){               
                $model = Notas::getNotasBySearch( Yii::$app->request->post("buscar"));
                $pagination = new Pagination([
                'defaultPageSize' => 10,
                'totalCount' => $model->count()
                ]);

                $modelo = $model
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

                return $this->render('articulos',['model'=>$modelo,'pagination' => $pagination, 'texto'=>'Resultados de: '. Yii::$app->request->post("buscar")]); 
                
            }else{
                return $this->redirect('index');
            }                
           }else{   
               if (Yii::$app->request->isAjax){
                   return $this->renderAjax('buscar');
               }else{
                    return $this->redirect('index');
               }
            
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
//        $model = new PasswordResetRequestForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail()) {
//                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');
//
//                return $this->goHome();
//            } else {
//                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
//            }
//        }
//
//        return $this->render('requestPasswordResetToken', [
//            'model' => $model,
//        ]);
    }

    public function actionResetPassword($token)
    {
//        try {
//            $model = new ResetPasswordForm($token);
//        } catch (InvalidParamException $e) {
//            throw new BadRequestHttpException($e->getMessage());
//        }
//
//        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
//            Yii::$app->getSession()->setFlash('success', 'New password was saved.');
//
//            return $this->goHome();
//        }
//
//        return $this->render('resetPassword', [
//            'model' => $model,
//        ]);
    }
}
