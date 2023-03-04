<?php

namespace App\Models;

use App\Entities\Clinic;

class ClinicModel extends BaseModel
{
    protected $DBGroup          = 'default';
    protected $table            = 'clinics';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Clinic::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'corporate_name',
        'fantasy_name',
        'responsible_name',
        'cnpj',
        'email',
        'phone_number',
        'cep',
        'address',
        'address_number',
        'address_complement',
        'address_district',
        'address_city',
        'address_state',
        'active'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['escapedDataXSS'];
    // protected $afterInsert    = [];
    protected $beforeUpdate   = ['escapedDataXSS'];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
