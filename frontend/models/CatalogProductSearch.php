<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CatalogProduct;

/**
 * CatalogProductSearch represents the model behind the search form about `common\models\CatalogProduct`.
 */
class CatalogProductSearch extends CatalogProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'catalog_category_id', 'price', 'stock', 'status'], 'integer'],
            [['title', 'model', 'imgUrl', 'desc', 'attribute_values'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CatalogProduct::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->params['itemPerPage'],
            ],
        ]);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }
        // filter categories
        if (isset($params['categories'])) {
            $query->andFilterWhere([
                'catalog_category_id' => $params['categories']
            ]);
        }
        // filter attributes
        if (isset($params['attributes'])) {
            foreach ($params['attributes'] as $attribute => $options) {
                $query->andFilterWhere([
                    '(!attr_' . $attribute . '!)' => $options
                ]);
            }
        }

        return $dataProvider;
    }
}
