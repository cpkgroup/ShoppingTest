<?php

namespace backend\controllers;

use Yii;
use common\models\CatalogProduct;
use common\models\CatalogProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for CatalogProduct model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CatalogProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatalogProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatalogProduct model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CatalogProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatalogProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->clearCache();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CatalogProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // set dynamic attributes here
        if (Yii::$app->request->post('CatalogProduct')) {
            $oldAttributes = json_decode($model->getAttribute(CatalogProduct::dynamicColumn()));
            if ($oldAttributes) {
                foreach ($oldAttributes as $key => $value) {
                    $model->setAttribute($key, null);
                }
            }
            foreach (Yii::$app->request->post('CatalogProduct') as $attr => $value) {
                if (strstr($attr, 'attr_')) {
                    $model->setAttribute($attr, $value);
                }
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->clearCache();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CatalogProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->clearCache();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatalogProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CatalogProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CatalogProduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * clear memory cache
     */
    private function clearCache() {
        // flush memory cache
        $cache = Yii::$app->cache;
        $cache->flush();
    }
}
