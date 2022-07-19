<?php

namespace app\controllers;

use app\models\Pembeli;
use app\models\PembeliSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PembeliController implements the CRUD actions for Pembeli model.
 */
class PembeliController extends Controller
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
     * Lists all Pembeli models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PembeliSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pembeli model.
     * @param int $id_pembeli Id Pembeli
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pembeli)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pembeli),
        ]);
    }

    /**
     * Creates a new Pembeli model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pembeli();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pembeli' => $model->id_pembeli]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pembeli model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pembeli Id Pembeli
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pembeli)
    {
        $model = $this->findModel($id_pembeli);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pembeli' => $model->id_pembeli]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pembeli model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pembeli Id Pembeli
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pembeli)
    {
        $this->findModel($id_pembeli)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pembeli model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pembeli Id Pembeli
     * @return Pembeli the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pembeli)
    {
        if (($model = Pembeli::findOne(['id_pembeli' => $id_pembeli])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
