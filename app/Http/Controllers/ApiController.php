<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

abstract class ApiController extends Controller
{

    /**
     * Returns a generic success (200) JSON response.
     *
     * @param  string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseSuccess($message = 'Success.')
    {
        return response()->json([
            'status' => 200,
            'message' => $message,
        ], 200);
    }

    /**
     * Returns a resource updated success message (200) JSON response.
     *
     * @param  string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseResourceUpdated($data,$message = 'Record updated.')
    {
        return response()->json([
            'status' => 200,
            'message' => $message,
            'data' => $data,
        ], 200);
    }

    /**
     * Returns a resource created (201) JSON response.
     *
     * @param  string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseResourceCreated($data, $message = 'Record created.')
    {
        return response()->json([
            'status' => 201,
            'message' => $message,
            'data' => $data,
        ], 201);
    }

    /**
     * Returns a resource deleted (204) JSON response.
     *
     * @param  string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseResourceDeleted($message = 'Resource deleted.')
    {
        return response()->json([
            'status' => 204,
            'message' => $message,
        ], 204);
    }

    /**
     * Returns an unauthorized (401) JSON response.
     *
     * @param  array $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseUnauthorized($errors = ['Wrong email or password.'])
    {
        return response()->json([
            'status' => 401,
            'errors' => $errors,
        ], 401);
    }

    /**
     * Returns a unprocessable entity (422) JSON response.
     *
     * @param  array $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseUnprocessable($errors)
    {
        return response()->json([
            'status' => 422,
            'errors' => $errors,
        ], 422);
    }

    /**
     * Returns a server error (500) JSON response.
     *
     * @param  array $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseServerError($errors = ['Server error.'])
    {
        return response()->json([
            'status' => 500,
            'errors' => $errors
        ], 500);
    }

    public function responseNotfoundError($errors = ['Record not found.'])
    {
        return response()->json([
            'status' => 404,
            'errors' => $errors
        ], 404);
    }

    public function ticketNotFound($errors = ['Ticket not found.'])
    {
        return response()->json([
            'status' => 404,
            'errors' => $errors
        ], 404);
    }

    public function ticketUnauthorized($errors = ['Ticket Unauthorized'])
    {
        return response()->json([
            'status' => 401,
            'errors' => $errors
        ], 401);
    }

    public function userUnauthorized($errors = ['User Unauthorized'])
    {
        return response()->json([
            'status' => 401,
            'errors' => $errors
        ], 401);
    }
}
