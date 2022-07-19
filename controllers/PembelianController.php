<?php

namespace app\controllers;

use app\models\Pembelian;
use app\models\PembelianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PembelianController implements the CRUD actions for Pembelian model.
 */
class PembelianController extends Controller
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
     * Lists all Pembelian models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PembelianSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pembelian model.
     * @param int $id_pembelian Id Pembelian
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pembelian)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pembelian),
        ]);
    }

    /**
     * Creates a new Pembelian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pembelian();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pembelian' => $model->id_pembelian]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pembelian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pembelian Id Pembelian
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pembelian)
    {
        $model = $this->findModel($id_pembelian);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pembelian' => $model->id_pembelian]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pembelian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pembelian Id Pembelian
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pembelian)
    {
        $this->findModel($id_pembelian)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pembelian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pembelian Id Pembelian
     * @return Pembelian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pembelian)
    {
        if (($model = Pembelian::findOne(['id_pembelian' => $id_pembelian])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
