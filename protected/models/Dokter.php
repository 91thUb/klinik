<?php

/**
 * This is the model class for table "dokter".
 *
 * The followings are the available columns in table 'dokter':
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $no_telp
 * @property string $gelar_depan
 * @property string $gelar_belakang
 * @property integer $umur
 *
 * The followings are the available model relations:
 * @property RiwayatBerobat[] $riwayatBerobats
 */
class Dokter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dokter the static model class
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
		return 'dokter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            
			array('nama, alamat, no_telp, gelar_depan, gelar_belakang, umur', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, alamat, no_telp, gelar_depan, gelar_belakang, umur', 'safe', 'on'=>'search'),
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
			'riwayatBerobats' => array(self::HAS_MANY, 'RiwayatBerobat', 'id_dokter'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama Dokter',
			'alamat' => 'Alamat',
			'no_telp' => 'No Telp',
			'gelar_depan' => 'Gelar Depan',
			'gelar_belakang' => 'Gelar Belakang',
			'umur' => 'Umur',
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
		$criteria->compare('gelar_depan',$this->gelar_depan,true);
		$criteria->compare('gelar_belakang',$this->gelar_belakang,true);
		$criteria->compare('umur',$this->umur);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}