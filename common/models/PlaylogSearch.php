<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PlaylogSearch represents the model behind the search form about `common\models\PlayLog`.
 */
class PlaylogSearch extends PlayLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['play_id', 'player_id', 'conduct_id', 'happen_time'], 'integer'],
            [['experience', 'integral'], 'double'],
            [['conduct_name','player_name','rewards_penalties_name'],'string'],
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
        $query = PlayLog::find();
        $query->joinWith('conduct');
        $query->joinWith('player');
        $query->joinWith('rewardspenalties');
        $query->select(PlayLog::tableName().'.*,conduct_name,player_name,rewards_penalties_name');

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
            'play_id' => $this->play_id,
            'player_id' => $this->player_id,
            'conduct_id' => $this->conduct_id,
        ]);

        $query->andFilterWhere(['like', 'conduct_name', $this->conduct_name])
            ->andFilterWhere(['like', 'player_name', $this->player_name])
            ->andFilterWhere(['like', 'rewards_penalties_name', $this->rewards_penalties_name])
            ->andFilterWhere(['like', PlayLog::tableName().'.experience', $this->experience])
            ->andFilterWhere(['like', PlayLog::tableName().'.integral', $this->integral])
            ->andFilterWhere(['like', PlayLog::tableName().'.happen_time', $this->happen_time]);

        return $dataProvider;
    }
}
