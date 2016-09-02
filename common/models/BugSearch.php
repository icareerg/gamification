<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Bug;

/**
 * BugSearch represents the model behind the search form about `common\models\Bug`.
 */
class BugSearch extends Bug
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bug_id', 'player_id'], 'integer'],
            [['player_name', 'severity'],'string'],
            [['happen_time'],'date','format'=>'yyyy-MM-dd'],
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
        $query = Bug::find();
        $query->joinWith('player');
        $query->select(Bug::tableName().'.*,player_name');

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
            'happen_time' => $this->happen_time,
        ]);

        $query->andFilterWhere(['like', 'severity', \common\lib\common::getSeverity($this->severity)])
            ->andFilterWhere(['like', 'player_name', $this->player_name]);

        return $dataProvider;
    }
}
