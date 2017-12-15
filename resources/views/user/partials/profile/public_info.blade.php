<h3>
    <i class="fa fa-unlock">
    </i> Public Info
</h3>
<table class="table table-condensed table-bordered table-striped">
    <tbody>
    <tr>
        <td colspan="2">
            <ul class="list-inline mb-0">
                <li>
            <span class="badge-extra text-green text-bold">
              <i class="fa fa-upload">
              </i> Total Uploads: {{ $user->torrents->count() }}
            </span>
                </li>
                <li>
            <span class="badge-extra text-red text-bold">
              <i class="fa fa-download">
              </i> Total Downloads: {{ $history->where('actual_downloaded', '>', 0)->count() }}
            </span>
                </li>
                <li>
            <span class="badge-extra text-green text-bold">
              <i class="fa fa-cloud-upload">
              </i> Total Seeding: {{ $user->getSeeding() }}
            </span>
                </li>
                <li>
            <span class="badge-extra text-red text-bold">
              <i class="fa fa-cloud-download">
              </i> Total Leeching: {{ $user->getLeeching() }}
            </span>
                </li>
            </ul>
        </td>
    </tr>
    <tr>
        <td>Downloaded
        </td>
        <td>
        <span class="badge-extra text-red" data-toggle="tooltip" title=""
              data-original-title="Recorded Download">{{ $user->getDownloaded() }}
        </span> -
            <span class="badge-extra text-yellow" data-toggle="tooltip" title=""
                  data-original-title="Download Removed From BON Store">N/A
        </span> =
            <span class="badge-extra text-orange" data-toggle="tooltip" title=""
                  data-original-title="True Download">N/A
        </span>
        </td>
    </tr>
    <tr>
        <td>Uploaded
        </td>
        <td>
        <span class="badge-extra text-green" data-toggle="tooltip" title=""
              data-original-title="Recorded Upload">{{ $user->getUploaded() }}
        </span> -
            <span class="badge-extra text-yellow" data-toggle="tooltip" title=""
                  data-original-title="Upload Added From BON Store">N/A
        </span> =
            <span class="badge-extra text-orange" data-toggle="tooltip" title=""
                  data-original-title="True Upload">N/A
        </span>
        </td>
    </tr>
    <tr>
        <td>Ratio
        </td>
        <td>
        <span class="badge-user group-member">{{ $user->getRatio() }}
        </span>
        </td>
    </tr>
    <tr>
        <td>Total Seedtime (All Torrents)
        </td>
        <td>
        <span class="badge-user group-member">
          {{ App\Helpers\StringHelper::timeElapsed($history->sum('seedtime')) }}
        </span>
        </td>
    </tr>
    <tr>
        <td>Average Seedtime (Per Torrent)
        </td>
        <td>
        <span class="badge-user group-member">
          {{ App\Helpers\StringHelper::timeElapsed(round($history->sum('seedtime') / max(1, $history->count()))) }}
        </span>
        </td>
    </tr>
    <tr>
        <td>Badges
        </td>
        <td>
            @if($user->getSeeding() >= 150)
                <span class="badge-user" style="background-color:#3fb618; color:white;"
                      data-toggle="tooltip" title=""
                      data-original-title="Seeding 150 Or More Torrents!">
          <i class="fa fa-upload">
          </i> Certified Seeder!
        </span>
            @endif
            @if($history->where('actual_downloaded', '>', 0)->count() >= 100)
                <span class="badge-user" style="background-color:#ff0039; color:white;"
                      data-toggle="tooltip" title=""
                      data-original-title="Downloaded 100 Or More Torrents!">
          <i class="fa fa-download">
          </i> Certified Downloader!
        </span>
            @endif
            @if($user->getSeedbonus() >= 50000)
                <span class="badge-user" style="background-color:#9400d3; color:white;"
                      data-toggle="tooltip" title=""
                      data-original-title="Has 50,000 Or More BON In Bank">
          <i class="fa fa-star">
          </i> Certified Banker!
        </span>
            @endif
        </td>
    </tr>
    <tr>
        <td>Title
        </td>
        <td>
        <span class="badge-extra">{{ $user->title }}
        </span>
        </td>
    </tr>
    <tr>
        <td>About Me
        </td>
        <td>
        <span class="badge-extra">@emojione($user->getAboutHtml())
        </span>
        </td>
    </tr>
    <tr>
        <td>Extra
        </td>
        <td>
            <ul class="list-inline mb-0">
                <li>
            <span class="badge-extra">
              <strong>Thanks Received:
              </strong>
              <span class="text-pink text-bold">{{ $user->thanksReceived->count() }}
              </span>
            </span>
                </li>
                <li>
            <span class="badge-extra">
              <strong>Thanks Given:
              </strong>
              <span class="text-green text-bold">
                {{ $user->thanksGiven->count() }}
              </span>
            </span>
                </li>
                <li>
            <span class="badge-extra">
              <strong>Article Comments Made:
              </strong>
              <span class="text-purple text-bold">
                {{ $user->comments()->where('article_id', '>', 0)->count() }}
              </span>
            </span>
                </li>
                <li>
            <span class="badge-extra">
              <strong>Torrent Comments Made:
              </strong>
              <span class="text-purple text-bold">
                {{ $user->comments()->where('torrent_id', '>', 0)->count() }}
              </span>
            </span>
                </li>
                <li>
            <span class="badge-extra">
              <strong>Request Comments Made:
              </strong>
              <span class="text-purple text-bold">{{ $user->comments()->where('requests_id', '>', 0)->count() }}
              </span>
            </span>
                </li>
                <li>
            <span class="badge-extra">
              <strong>Forum Topics Made:
              </strong>
              <span class="text-purple text-bold">{{ $user->topics->count() }}
              </span>
            </span>
                </li>
                <li>
            <span class="badge-extra">
              <strong>Forum Posts Made:
              </strong>
              <span class="text-purple text-bold">{{ $user->posts->count() }}
              </span>
            </span>
                </li>
                <li>
            <span class="badge-extra">
              <strong>Hit and Run Count (All Time):
              </strong>
              <span class="text-red text-bold">{{ $hitruns }}
              </span>
            </span>
                </li>
            </ul>
        </td>
    </tr>
    <tr>
        <td>Warnings
        </td>
        <td>
        <span class="badge-extra text-red text-bold">
          <strong>Active Warnings: {{ $warnings->count() }}
              / {!! Config::get('hitrun.max_warnings') !!}
          </strong>
        </span>
            @if(Auth::check() && $owner->id === $user->id)
                <a href="{{ route('warninglog', ['username' => $user->username, 'id' => $user->id]) }}">
          <span
                  class="badge-extra text-bold">
            <strong>Warning Log
            </strong>
          </span>
                </a>
            @endif
            <div class="progress">
                <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar"
                     style="width:.1%;border-bottom-color: #8c0408">
                </div>
                @foreach($warnings as $warning)
                    <div class="progress-bar progress-bar-danger progress-bar-striped active"
                         role="progressbar" style="width:33.3%;border-bottom-color: #8c0408">
                        WARNING
                    </div>
                @endforeach
            </div>
        </td>
    </tr>
    </tbody>
</table>
