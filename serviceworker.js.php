<?php
if ( 'OPTIONS' == strtoupper( $_SERVER['REQUEST_METHOD'] ) ) :
  header( 'Content-Length: 0' );
  header( 'Content-Type: text/plain' );
  die();
endif;

header( 'Pragma: no-cache' );
header( 'Cache-Control: private, no-cache, no-store, max-age=0, must-revalidate, proxy-revalidate' );
header( 'Cache-Control: post-check=0, pre-check=0', false );
header( 'Content-Type: application/javascript' );

?>

var CACHE_NAME = 'maolivre-cache-0.0.1';
var urlsToCache = [
  '/'
];

self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        return cache.addAll(urlsToCache);
      })
      .then(self.skipWaiting())
  );
});

self.addEventListener('activate', function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if ( cacheName != CACHE_NAME ) {
            return caches.delete(cacheName);
          } else {
            return true;
          }
        })
      );
    }).then(() => self.clients.claim())
  );
});

self.addEventListener('fetch', function(event) {
  if (event.request.url.startsWith(self.location.origin)) {
    event.respondWith(async function() {
      const cache = await caches.open(CACHE_NAME);
      const cachedResponse = await cache.match(event.request);
      if (cachedResponse) {
        return cachedResponse;
      }
      return fetch(event.request);
    }());
  }
});
