<?php

/**
 * VERY basic form processing
 */
$input = $_POST;

$validation = validateFields($input);
echo json_encode($validation);


function validateFields($fields) {

    $output = (object)[
            'status' => 1,
            'errors' => [],
        ];

    if (isset($fields['label'])) {
        if (strlen(trim($input['label'])) == 0) {
            $output->status = 0;
            array_push($output->errors,
                        ['field' => 'data-label',
                        'error' => 'Label cannot be blank']
            );
        }
    }


    if (isset($input['valueRequired'])
        && strlen(trim($input['defaultValue'])) == 0
    ) {
        $output->status = 0;
        array_push($output->errors,
                ['field' => 'default-value',
                'error' => "Default value cannot be blank when a value is required.",]
        );
    }

    return $output;
}
