<?php

/**
 * This is the model class for table "operator".
 *
 * The followings are the available columns in table 'operator':
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $no_telp
 * @property integer $umur
 * @property string $user_name
 * @property string $user_passwd
 * @property integer $id_type_operator
 *
 * The followings are the available model relations:
 * @property TypeOperator $idTypeOperator
 * @property RiwayatBerobat[] $riwayatBerobats
 */
class Operator extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Operator the static model class
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
		return 'operator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, alamat, no_telp, umur, user_name, user_passwd, id_type_operator', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, alamat, no_telp, umur, user_name, user_passwd, id_type_operator', 'safe', 'on'=>'search'),
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
			'idTypeOperator' => array(self::BELONGS_TO, 'TypeOperator', 'id_type_operator'),
			'riwayatBerobats' => array(self::HAS_MANY, 'RiwayatBerobat', 'id_operator'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama Operator',
			'alamat' => 'Alamat',
			'no_telp' => 'No Telp',
			'umur' => 'Umur',
			'user_name' => 'User Name',
			'user_passwd' => 'User Passwd',
			'id_type_operator' => 'Type Operator',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('umur',$this->umur);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_passwd',$this->user_passwd,true);
		$criteria->compare('id_type_operator',$this->id_type_operator);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}