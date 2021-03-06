@extends('layouts.app')

@section('content')

  <div class="uk-section">
    <div class="uk-container uk-container-expand">

      @foreach ($errors->all() as $message)
        <div class="uk-alert-danger" uk-alert>
          <p>{{ $message }}</p>
        </div>
      @endforeach

      <form action="{{ route('integration.store') }}" method="post" class="uk-form-stacked">
        {{ csrf_field() }}

        <div class="uk-margin">
          <label class="uk-form-label" for="form-stacked-select">サービス</label>
          <div class="uk-form-controls">
            <select name="service" class="uk-select" id="form-stacked-select">
              <option value="slack" selected>Slack</option>
            </select>
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="form-stacked-text">ChatWork ルームID</label>
          <div class="uk-form-controls">
            <input name="recipient" value="" class="uk-input" id="form-stacked-text" type="text" placeholder="ルームID...">
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="form-stacked-text">ChatWork APIトークン</label>
          <div class="uk-form-controls">
            <input name="api_token" value="" class="uk-input" id="form-stacked-text" type="text" placeholder="APIトークン...">
          </div>
        </div>


        <div class="uk-margin">
          <button class="uk-button uk-button-primary">作成</button>

        </div>

      </form>

    </div>
  </div>

@endsection
