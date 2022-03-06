@extends('errors.templates.minimal')

@section('code', '500')

@section('title', $title ?? trans('global.errors.server_error'))

@section('message', $message ?? trans('global.errors.server_error'))
