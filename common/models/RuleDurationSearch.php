<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RuleDurationSearch represents the model behind the search form about `app\models\RuleDuration`.
 */
class RuleDurationSearch extends RuleDuration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rule_id', 'level_id', 'duration_id'], 'integer'],
            [['level_name', 'duration_name'], 'string'],
            [['percentage'], 'number'],
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
        $query = RuleDuration::find();
        $query->joinWith('level');
        $query->joinWith('duration');
        $query->select(RuleDuration::tableName().'.*,level_name,duration_name');

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
            'rule_id' => $this->rule_id,
            'level_id' => $this->level_id,
            'duration_id' => $this->duration_id,
            'percentage' => $this->percentage,
        ]);

        $query->andFilterWhere(['like', 'level_name', $this->level_name])
            ->andFilterWhere(['like', 'duration_name', $this->duration_name]);

        return $dataProvider;
    }
}