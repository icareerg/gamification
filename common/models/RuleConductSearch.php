<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RuleConductSearch represents the model behind the search form about `app\models\RuleConduct`.
 */
class RuleConductSearch extends RuleConduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rule_id', 'level_id', 'conduct_id'], 'integer'],
            [['experience', 'integral'], 'number'],
            [['level_name','conduct_name', 'rewards_penalties_name'],'string'],
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
        $query = RuleConduct::find();
        $query->joinWith('level');
        $query->joinWith('conduct');
        $query->joinWith('rewardspenalties');
        $query->select(RuleConduct::tableName().'.*,level_name,conduct_name,rewards_penalties_name');

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
            'conduct_id' => $this->conduct_id,
            'experience' => $this->experience,
            'integral' => $this->integral,
        ]);

        $query->andFilterWhere(['like', 'level_name', $this->level_name])
            ->andFilterWhere(['like', 'conduct_name', $this->conduct_name])
            ->andFilterWhere(['like', 'rewards_penalties_name', $this->rewards_penalties_name]);

        return $dataProvider;
    }
}
