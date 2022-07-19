<?php

namespace app\controllers;

use app\models\Suplier;
use app\models\SuplierSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SuplierController implements the CRUD actions for Suplier model.
 */
class SuplierController extends Controller
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
     * Lists all Suplier models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SuplierSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Suplier model.
     * @param int $id_suplier Id Suplier
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_suplier)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_suplier),
        ]);
    }

    /**
     * Creates a new Suplier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Suplier();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_suplier' => $model->id_suplier]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Suplier model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_suplier Id Suplier
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_suplier)
    {
        $model = $this->findModel($id_suplier);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_suplier' => $model->id_suplier]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Suplier model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_suplier Id Suplier
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_suplier)
    {
        $this->findModel($id_suplier)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Suplier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_suplier Id Suplier
     * @return Suplier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_suplier)
    {
        if (($model = Suplier::findOne(['id_suplier' => $id_suplier])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
