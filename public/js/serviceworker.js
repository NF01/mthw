const CACHE_VERSION = '2';

self.addEventListener('install', async event => {
    self.skipWaiting(); //life cycle management
    console.log("Installing ...");
    // ??? pre-cache ? autres ?
    const cache = await caches.open(CACHE_VERSION);
    return cache.addAll(
        [
            '/css/app.css',
            '/css/style.css',
            '/js/app.js',
            '/css/font/SBBWeb-Roman.woff2',
            '/css/font/SBBWeb-Bold.woff2',
            '/img/edelweiss.png',
            '/svg/train-top-entier.svg',
        ]);
    // cache.add("app.css");
    // cache.add("style.css");
});

self.addEventListener('fetch', async event => {
    const fetchCacheFirst = async () => {
        const cache = await caches.open(CACHE_VERSION);
        const cached = await cache.match(event.request);
        // console.log('attention it\'s caching');
        if (cached) return cached;
        let response = await fetch(event.request);
        if (response) cache.put(event.request, response.clone());
        // if (response && !event.request.includes('/api/')) cache.put(event.request, response.clone());
        return response;
    };
    event.respondWith(fetchCacheFirst());

    // if (event.request.url.includes("truc.txt")) {
    //   let response = new Response("");
    //   event.respondWith(response);
    // }
});

self.addEventListener('activate', event => {
    const clearOldCache = async () => {
        let keys = await caches.keys();
        keys = keys.filter(key => key !== CACHE_VERSION);
        return Promise.all(keys.map(key => caches.delete(key)));
    }
    event.waitUntil(clearOldCache());
});