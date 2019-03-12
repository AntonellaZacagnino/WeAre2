<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GetStream\StreamLaravel\Enrich;

class FeedsController extends Controller
{
  public function newsFeed(Request $request)
  {
      // Timeline feed:
      $feed = \FeedManager::getNewsFeeds($request->user()->id)['timeline'];

      //  get 25 most recent activities from the timeline feed:
      $activities = $feed->getActivities(0,25)['results'];
      $activities = $this->enrich()->enrichActivities($activities);

      return view('feed.newsfeed', [
          'activities' => $activities,
      ]);
  }

  private function enrich()
  {
      return new Enrich;
  }
}
