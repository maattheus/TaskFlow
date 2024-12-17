<?php

function responseHandler($params)
{
    
    return response()->json([

        'message' => $params['message'],
        'status'  => $params['status'],
        'data'    => !isset($params['data']) ?: $params['data']

    ],$params['status']);

}