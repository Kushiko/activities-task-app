<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Types</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-white text-xl font-bold" href="/">Activities Test App</a>
            <div>
                <ul class="flex space-x-4">
                    <li><a class="text-white hover:text-gray-300" href="/">Activities</a></li>
                    <li><a class="text-white hover:text-gray-300" href="/participants">Participants</a></li>
                    <li><a class="text-white hover:text-gray-300 font-bold" aria-current="page" href="/activity-types">Activity Types</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        <h1 class="text-3xl font-bold mb-6 text-white">Activity Types</h1>
        <div id="activity-types-list" class="flex flex-wrap -mx-4">
        </div>
        <div id="pagination-controls" class="flex justify-between mt-8">
            <button id="prev-page" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" disabled>Previous</button>
            <button id="next-page" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" disabled>Next</button>
        </div>
    </div>

    <script>
        const activityTypesList = document.getElementById('activity-types-list');
        const prevPageBtn = document.getElementById('prev-page');
        const nextPageBtn = document.getElementById('next-page');
        const currentPageUrl = '/api/v1/activity-types';

        async function fetchActivityTypes(url) {
            try {
                const response = await fetch(url);
                const data = await response.json();

                activityTypesList.innerHTML = '';
                data.data.forEach(activityType => {
                    const activityTypeCard = `
                        <div class="w-full md:w-1/3 px-4 mb-8">
                            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden text-gray-100">
                                <div class="p-6">
                                    <h5 class="text-2xl font-semibold mb-2">${activityType.name}</h5>
                                    <p class="text-gray-400 text-sm mb-4">Display Order: ${activityType.displayOrder}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    activityTypesList.innerHTML += activityTypeCard;
                });

                prevPageBtn.disabled = !data.links.prev;
                nextPageBtn.disabled = !data.links.next;
                prevPageBtn.onclick = () => fetchActivityTypes(data.links.prev);
                nextPageBtn.onclick = () => fetchActivityTypes(data.links.next);

            } catch (error) {
                console.error('Error fetching activity types:', error);
                activityTypesList.innerHTML = '<div class="w-full px-4 text-red-500">Failed to load activity types.</div>';
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            fetchActivityTypes(currentPageUrl);
        });
    </script>
</body>
</html>
