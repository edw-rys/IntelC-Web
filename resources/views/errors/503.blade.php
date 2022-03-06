@extends('errors.templates.illustrated-layout')

@section('code', '503')

@section('title', $title ?? trans('global.errors.service_unavailable'))

@section('message', $message ?? trans('global.errors.service_unavailable'))
