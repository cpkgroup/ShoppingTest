<?php

namespace common\models;

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

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'catalog_category_id' => $this->catalog_category_id,
            'price' => $this->price,
            'stock' => $this->stock,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'imgUrl', $this->imgUrl])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'attribute_values', $this->attribute_values]);

        return $dataProvider;
    }
}
