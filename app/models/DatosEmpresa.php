<?php

class DatosEmpresa extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $codEmpresa;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=false)
     */
    public $razonSocial;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $limiteUsuarios;

    /**
     * Method to set the value of field codEmpresa
     *
     * @param integer $codEmpresa
     * @return $this
     */
    public function setCodEmpresa($codEmpresa)
    {
        $this->codEmpresa = $codEmpresa;

        return $this;
    }

    /**
     * Method to set the value of field razonSocial
     *
     * @param string $razonSocial
     * @return $this
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Method to set the value of field limiteUsuarios
     *
     * @param integer $limiteUsuarios
     * @return $this
     */
    public function setLimiteUsuarios($limiteUsuarios)
    {
        $this->limiteUsuarios = $limiteUsuarios;

        return $this;
    }

    /**
     * Returns the value of field codEmpresa
     *
     * @return integer
     */
    public function getCodEmpresa()
    {
        return $this->codEmpresa;
    }

    /**
     * Returns the value of field razonSocial
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Returns the value of field limiteUsuarios
     *
     * @return integer
     */
    public function getLimiteUsuarios()
    {
        return $this->limiteUsuarios;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("incloudt");
        $this->setSource("datos_empresa");
        $this->belongsTo('codEmpresa', '\Empresa', 'codEmpresa', ['alias' => 'Empresa']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DatosEmpresa[]|DatosEmpresa|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DatosEmpresa|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'codEmpresa' => 'codEmpresa',
            'razonSocial' => 'razonSocial',
            'limiteUsuarios' => 'limiteUsuarios'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'datos_empresa';
    }

}
