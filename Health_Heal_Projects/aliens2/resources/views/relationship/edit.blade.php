@extends('relationship.create')


@section('editid', $relationship->id)
@section('editrelationshiptype',$relationship->relationshiptype)

@section('editMethod')
{{method_field('PUT')}}
@endsection 