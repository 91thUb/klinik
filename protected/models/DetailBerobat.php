<?php

/**
 * This is the model class for table "detail_berobat".
 *
 * The followings are the available columns in table 'detail_berobat':
 * @property integer $id
 * @property integer $id_riwayat_berobat
 * @property integer $id_obat
 *
 * The followings are the available model relations:
 * @property Obat $idObat
 * @property RiwayatBerobat $idRiwayatBerobat
 */
class DetailBerobat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DetailBerobat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detail_berobat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_riwayat_berobat, id_obat', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_riwayat_berobat, id_obat', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idObat' => array(self::BELONGS_TO, 'Obat', 'id_obat'),
			'idRiwayatBerobat' => array(self::BELONGS_TO, 'RiwayatBerobat', 'id_riwayat_berobat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_riwayat_berobat' => 'Id Riwayat Berobat',
			'id_obat' => 'Id Obat',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_riwayat_berobat',$this->id_riwayat_berobat);
		$criteria->compare('id_obat',$this->id_obat);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}