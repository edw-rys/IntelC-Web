@extends('errors.templates.minimal')

@section('code', '403')

@section('title', $title ?? trans('global.errors.forbidden'))

@section('message', $message ?? trans('global.errors.forbidden'))
