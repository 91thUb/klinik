<?php

/**
 * This is the model class for table "suplier".
 *
 * The followings are the available columns in table 'suplier':
 * @property integer $id
 * @property string $nama_supplier
 * @property string $alamat
 * @property string $no_telp
 */
class Suplier extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Suplier the static model class
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
		return 'suplier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('nama_supplier, alamat, no_telp', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama_supplier, alamat, no_telp', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama_supplier' => 'Nama Supplier',
			'alamat' => 'Alamat',
			'no_telp' => 'No Telp',
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
		$criteria->compare('nama_supplier',$this->nama_supplier,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_telp',$this->no_telp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}