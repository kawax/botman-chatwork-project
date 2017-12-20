@extends('layouts.app')

@section('content')

  <div class="uk-section">
    <div class="uk-container uk-container-expand">

      <h2>連携設定</h2>


      <dl class="uk-description-list uk-description-list-divider uk-background-muted uk-padding">
        <dt>対応サービス</dt>
        <dd>現在はSlackのみ。<a href="https://api.slack.com/custom-integrations/outgoing-webhooks" target="_blank">Outgoing
            Webhook</a>を使ってSlackからChatWorkにそのまま流すだけ。
        </dd>
        <dt>ChatWork ルームID</dt>
        <dd>#!ridの後がルームID</dd>
        <dt>ChatWork APIトークン</dt>
        <dd>ルームごとに別のアカウントで投稿できるようにするため個別に設定。</dd>
        <dt>Webhook URL</dt>
        <dd>Slack側のOutgoing WebhookでこのURLを設定。</dd>
      </dl>

      <a href="{{ route('integration.create') }}" class="uk-button uk-button-primary">新規作成</a>

      {{ $integrations->links() }}

      <table class="uk-table uk-table-divider">
        <thead>
        <tr>
          <th>サービス</th>
          <th>ルームID</th>
          <th>Webhook URL</th>
          <th>変更</th>
        </tr>
        </thead>
        <tbody>
        @foreach($integrations as $integration)
          <tr>
            <td>{{ $integration->service }}</td>
            <td>{{ $integration->recipient }}</td>
            <td>{{ $integration->webhook_url }}</td>
            <td>
              <a href="{{ route('integration.edit', $integration->id) }}"
                 class="uk-button uk-button-primary uk-button-small">変更</a>
            </td>
          </tr>
        @endforeach

        </tbody>
      </table>

      {{ $integrations->links() }}

    </div>
  </div>

@endsection
