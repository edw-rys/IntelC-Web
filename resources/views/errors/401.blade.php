@extends('errors.templates.minimal')

@section('code', '401')

@section('title', $title ?? trans('global.errors.unauthorized'))

@section('message', $message ?? trans('global.errors.unauthorized'))
