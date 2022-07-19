<?php

namespace app\controllers;

use app\models\Pesanan;
use app\models\PesananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PesananController implements the CRUD actions for Pesanan model.
 */
class PesananController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Pesanan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PesananSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pesanan model.
     * @param int $id_pesanan Id Pesanan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pesanan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pesanan),
        ]);
    }

    /**
     * Creates a new Pesanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pesanan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pesanan' => $model->id_pesanan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pesanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pesanan Id Pesanan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pesanan)
    {
        $model = $this->findModel($id_pesanan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pesanan' => $model->id_pesanan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pesanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pesanan Id Pesanan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pesanan)
    {
        $this->findModel($id_pesanan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pesanan Id Pesanan
     * @return Pesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pesanan)
    {
        if (($model = Pesanan::findOne(['id_pesanan' => $id_pesanan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
