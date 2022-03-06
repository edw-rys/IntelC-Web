@extends('errors.templates.minimal')

@section('code', '419')

@section('title', $title ?? trans('global.errors.page_expired'))

@section('message', $message ?? trans('global.errors.page_expired'))
