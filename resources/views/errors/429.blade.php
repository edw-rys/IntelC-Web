@extends('errors.templates.minimal')

@section('code', '429')

@section('title', $title ?? trans('global.errors.too_many_requests'))

@section('message', $message ?? trans('global.errors.too_many_requests'))
