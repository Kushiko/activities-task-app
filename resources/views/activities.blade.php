<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-white text-xl font-bold" href="/">Activities Test App</a>
            <div>
                <ul class="flex space-x-4">
                    <li><a class="text-white hover:text-gray-300 font-bold" aria-current="page" href="/">Activities</a></li>
                    <li><a class="text-white hover:text-gray-300" href="/participants">Participants</a></li>
                    <li><a class="text-white hover:text-gray-300" href="/activity-types">Activity Types</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        <h1 class="text-3xl font-bold mb-6 text-white">Activities</h1>
        <div id="activities-list" class="flex flex-wrap -mx-4">
        </div>
        <div id="pagination-controls" class="flex justify-between mt-8">
            <button id="prev-page" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" disabled>Previous</button>
            <button id="next-page" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" disabled>Next</button>
        </div>
    </div>

    <script>
        const activitiesList = document.getElementById('activities-list');
        const prevPageBtn = document.getElementById('prev-page');
        const nextPageBtn = document.getElementById('next-page');
        const currentPageUrl = '/api/v1/activities';

        async function fetchActivities(url) {
            try {
                const response = await fetch(url);
                const data = await response.json();

                activitiesList.innerHTML = '';
                data.data.forEach(activity => {
                    const activityCard = `
                        <div class="w-full md:w-1/3 px-4 mb-8">
                            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden text-gray-100">
                                <div class="p-6">
                                    <h5 class="text-2xl font-semibold mb-2">${activity.name}</h5>
                                    <h6 class="text-gray-400 text-sm mb-4">${activity.activityType.name} - ${activity.participant.name}</h6>
                                    <p class="text-gray-300 text-base mb-4">${activity.shortDescription}</p>
                                    <p class="text-gray-400 text-sm mb-4">Likes: ${activity.likesCount}</small></p>
                                    ${activity.registrationUrl ? `<a href="${activity.registrationUrl}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-sm" target="_blank">Register</a>` : ''}
                                </div>
                            </div>
                        </div>
                    `;
                    activitiesList.innerHTML += activityCard;
                });

                prevPageBtn.disabled = !data.links.prev;
                nextPageBtn.disabled = !data.links.next;
                prevPageBtn.onclick = () => fetchActivities(data.links.prev);
                nextPageBtn.onclick = () => fetchActivities(data.links.next);

            } catch (error) {
                console.error('Error fetching activities:', error);
                activitiesList.innerHTML = '<div class="w-full px-4 text-red-500">Failed to load activities.</div>';
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            fetchActivities(currentPageUrl);
        });
    </script>
</body>
</html>
