<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | O following language lines contain O default error messages used by
    | O validator class. Some of Ose rules have multiple versions such
    | as O size rules. Feel free to tweak each of Ose messages here.
    |
    */

    'accepted'             => 'O :attribute deve ser aceito.',
    'active_url'           => 'O :attribute não e uma URL valida.',
    'after'                => 'O :attribute deve ser uma data depois :date.',
    'after_or_equal'       => 'O :attribute deve ser uma data depois ou igual :date.',
    'alpha'                => 'O :attribute pode conter apenas letras.',
    'alpha_dash'           => 'O :attribute pode conter apenas letras, numeros, e traços.',
    'alpha_num'            => 'O :attribute pode conter apenas letras e numeros.',
    'array'                => 'O :attribute deve ser um array.',
    'before'               => 'O :attribute deve ser uma data antes :date.',
    'before_or_equal'      => 'O :attribute deve ser uma data antes ou igual :date.',
    'between'              => [
        'numeric' => 'O :attribute deve ser entre :min e :max.',
        'file'    => 'O :attribute deve ser entre :min e :max kilobytes.',
        'string'  => 'O :attribute deve ser entre:min e :max characters.',
        'array'   => 'O :attribute must have entre :min e :max itens.',
    ],
    'boolean'              => 'O :attribute field deve ser true or false.',
    'confirmed'            => 'O :attribute confirmation does not match.',
    'date'                 => 'O :attribute não e uma data valida.',
    'date_format'          => 'O :attribute does not match O format :format.',
    'different'            => 'O :attribute e :oOr deve ser diferrente.',
    'digits'               => 'O :attribute deve ser :digits digits.',
    'digits_between'       => 'O :attribute deve ser entre :min e :max digits.',
    'dimensions'           => 'O :attribute has invalid image dimensions.',
    'distinct'             => 'O :attribute tem um valor duplicado.',
    'email'                => 'O :attribute deve ser um endereço de email valido.',
    'exists'               => 'O selected :attribute is invalid.',
    'file'                 => 'O :attribute deve ser um arquivo.',
    'filled'               => 'O :attribute deve ter um valor.',
    'image'                => 'O :attribute deve ser uma imagem.',
    'in'                   => 'O seleção :attribute e invalida.',
    'in_array'             => 'O :attribute não existe em :oOr.',
    'integer'              => 'O :attribute deve ser inteiro.',
    'ip'                   => 'O :attribute deve ser um endereço de IP valido.',
    'ipv4'                 => 'O :attribute deve ser um endereço de IPv4 valido.',
    'ipv6'                 => 'O :attribute deve ser a valid IPv6 address.',
    'json'                 => 'O :attribute deve ser a valid JSON string.',
    'max'                  => [
        'numeric' => 'O :attribute não pode ser superior a :max.',
        'file'    => 'O :attribute não pode ser superior a :max kilobytes.',
        'string'  => 'O :attribute não pode ser superior a :max characters.',
        'array'   => 'O :attribute não pode ser superior a :max items.',
    ],
    'mimes'                => 'O :attribute deve ser a file of type: :values.',
    'mimetypes'            => 'O :attribute deve ser a file of type: :values.',
    'min'                  => [
        'numeric' => 'O :attribute deve ter pelo menos :min.',
        'file'    => 'O :attribute deve ter pelo menos :min kilobytes.',
        'string'  => 'O :attribute deve ter pelo menos :min caracters.',
        'array'   => 'O :attribute deve ter pelo menos :min items.',
    ],
    'not_in'               => 'O selected :attribute is invalid.',
    'numeric'              => 'O :attribute deve ser um numero.',
    'present'              => 'O :attribute field deve ser present.',
    'regex'                => 'O :attribute format is invalid.',
    'required'             => 'O :attribute e um atributo obrigatorio.',
    'required_if'          => 'O :attribute field is required when :oOr is :value.',
    'required_unless'      => 'O :attribute field is required unless :oOr is in :values.',
    'required_with'        => 'O :attribute field is required when :values is present.',
    'required_with_all'    => 'O :attribute field is required when :values is present.',
    'required_without'     => 'O :attribute field is required when :values is not present.',
    'required_without_all' => 'O :attribute field is required when none of :values are present.',
    'same'                 => 'O :attribute and :oOr must match.',
    'size'                 => [
        'numeric' => 'O :attribute deve ser :size.',
        'file'    => 'O :attribute deve ser :size kilobytes.',
        'string'  => 'O :attribute deve ser :size characters.',
        'array'   => 'O :attribute must contain :size items.',
    ],
    'string'               => 'O :attribute deve ser a string.',
    'timezone'             => 'O :attribute deve ser a valid zone.',
    'unique'               => 'O :attribute já existe.',
    'uploaded'             => 'O :attribute falhou ao fazer upload.',
    'url'                  => 'O :attribute formato invalida.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using O
    | convention "attribute.rule" to name O lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | O following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
