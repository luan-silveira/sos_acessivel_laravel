<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O :attribute deve be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'O :attribute deve be a date after :date.',
    'after_or_equal'       => 'O :attribute deve be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'O :attribute deve be an array.',
    'before'               => 'O :attribute deve be a date before :date.',
    'before_or_equal'      => 'O :attribute deve be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'O :attribute deve estar entre :min e :max.',
        'file'    => 'O :attribute deve estar entre :min e :max kilobytes (kB).',
        'string'  => 'O :attribute deve ter entre :min e :max caracteres.',
        'array'   => 'O :attribute deve ter between :min and :max itens.',
    ],
    'boolean'              => 'O :attribute field deve ser \'true\' or \'false\'.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'O campo :attribute não é uma data válida.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'O :attribute deve be :digits digits.',
    'digits_between'       => 'O :attribute deve estar entre :min e :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'O email :attribute deve ser único.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'O :attribute deve be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'gt'                   => [
        'numeric' => 'O :attribute deve be greater than :value.',
        'file'    => 'O :attribute deve be greater than :value kilobytes.',
        'string'  => 'O :attribute deve be greater than :value characters.',
        'array'   => 'O :attribute deve have more than :value items.',
    ],
    'gte'                  => [
        'numeric' => 'O :attribute deve be greater than or equal :value.',
        'file'    => 'O :attribute deve be greater than or equal :value kilobytes.',
        'string'  => 'O :attribute deve be greater than or equal :value characters.',
        'array'   => 'O :attribute deve have :value items or more.',
    ],
    'image'                => 'O :attribute deve be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'O :attribute deve be an integer.',
    'ip'                   => 'O :attribute deve be a valid IP address.',
    'ipv4'                 => 'O :attribute deve be a valid IPv4 address.',
    'ipv6'                 => 'O :attribute deve be a valid IPv6 address.',
    'json'                 => 'O :attribute deve be a valid JSON string.',
    'lt'                   => [
        'numeric' => 'O :attribute deve be less than :value.',
        'file'    => 'O :attribute deve be less than :value kilobytes.',
        'string'  => 'O :attribute deve be less than :value characters.',
        'array'   => 'O :attribute deve have less than :value items.',
    ],
    'lte'                  => [
        'numeric' => 'O :attribute deve be less than or equal :value.',
        'file'    => 'O :attribute deve be less than or equal :value kilobytes.',
        'string'  => 'O :attribute deve be less than or equal :value characters.',
        'array'   => 'O :attribute deve not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'O :attribute deve be a file of type: :values.',
    'mimetypes'            => 'O :attribute deve be a file of type: :values.',
    'min'                  => [
        'numeric' => 'O :attribute deve be at least :min.',
        'file'    => 'O :attribute deve be at least :min kilobytes.',
        'string'  => 'O :attribute deve be at least :min characters.',
        'array'   => 'O :attribute deve have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => 'O :attribute deve be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'O :attribute deve be :size.',
        'file'    => 'O :attribute deve be :size kilobytes.',
        'string'  => 'O :attribute deve be :size characters.',
        'array'   => 'O :attribute deve contain :size items.',
    ],
    'string'               => 'O :attribute deve be a string.',
    'timezone'             => 'O :attribute deve be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
