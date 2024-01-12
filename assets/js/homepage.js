$(document).ready(function() {
    $.ajax({
        url: 'index.php?page=home',
        method: 'GET',
        data: { action: 'Wikis'},
        // dataType: 'json',
        success: function(data) {
            //console.log(data);
            let wikiInfo =JSON.parse(data);

            if (wikiInfo) {
                wikiInfo.forEach(wikiData=> {
                    $('#wikiContainer').append(generateWikiCard(wikiData));
                });
            } else {
                $('#wikiContainer').html('Wiki not found');
            }
        },
        error: function(xhr, status, error) {
            console.error("Error:", status, error);
            $('#wikiContainer').html('Error fetching wiki data');
        }

    });

});

/////////////////////////////////////////////////       Generate wiki cards for homepage
function generateWikiCard(wikiData) {
    return `
            <div class="p-4 lg:w-fit">
                <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">${wikiData.category}</h2>
                    <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">${wikiData.title}</h1>
                    <p class="leading-relaxed mb-3"> ${wikiData.description}</p>
                    <a href="index.php?page=wiki&wiki_id=${wikiData.wiki_id}"  id="link_to_wiki" data-wiki-id="${wikiData.wiki_id}" class="text-indigo-500 inline-flex items-center" >
                        Learn More
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </a>


                    <p class="leading-relaxed mb-3 mt-6 ">  <span class="font-bold">Tags: </span> ${wikiData.tags} </p>
                    <div class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4">
                        <span class="text-gray-400 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.88 122.89" class="w-4 h-4 mr-1 text-gray-400">
                                  <path d="M81.61,4.73C81.61,2.12,84.19,0,87.38,0s5.77,2.12,5.77,4.73V25.45c0,2.61-2.58,4.73-5.77,4.73s-5.77-2.12-5.77-4.73V4.73ZM66.11,105.66c-.8,0-.8-10.1,0-10.1H81.9c.8,0,.8,10.1,0,10.1ZM15.85,68.94c-.8,0-.8-10.1,0-10.1H31.64c.8,0,.8,10.1,0,10.1Zm25.13,0c-.8,0-.8-10.1,0-10.1H56.77c.8,0,.8,10.1,0,10.1Zm25.13,0c-.8,0-.8-10.1,0-10.1H81.9c.8,0,.8,10.1,0,10.1Zm25.14-10.1H107c.8,0,.8,10.1,0,10.1H91.25c-.8,0-.8-10.1,0-10.1ZM15.85,87.3c-.8,0-.8-10.1,0-10.1H31.64c.8,0,.8,10.1,0,10.1ZM41,87.3c-.8,0-.8-10.1,0-10.1H56.77c.8,0,.8,10.1,0,10.1Zm25.13,0c-.8,0-.8-10.1,0-10.1H81.9c.8,0,.8,10.1,0,10.1Zm25.14,0c-.8,0-.8-10.1,0-10.1H107c.8,0,.8,10.1,0,10.1Zm-75.4,18.36c-.8,0-.8-10.1,0-10.1H31.64c.8,0,.8,10.1,0,10.1Zm25.13,0c-.8,0-.8-10.1,0-10.1H56.77c.8,0,.8,10.1,0,10.1ZM29.61,4.73C29.61,2.12,32.19,0,35.38,0s5.77,2.12,5.77,4.73V25.45c0,2.61-2.58,4.73-5.77,4.73s-5.77-2.12-5.77-4.73V4.73ZM6.4,43.47H116.47v-22a3,3,0,0,0-.86-2.07,2.92,2.92,0,0,0-2.07-.86H103a3.2,3.2,0,0,1,0-6.4h10.55a9.36,9.36,0,0,1,9.33,9.33v92.09a9.36,9.36,0,0,1-9.33,9.33H9.33A9.36,9.36,0,0,1,0,113.55V21.47a9.36,9.36,0,0,1,9.33-9.33H20.6a3.2,3.2,0,1,1,0,6.4H9.33a3,3,0,0,0-2.07.86,2.92,2.92,0,0,0-.86,2.07v22Zm110.08,6.41H6.4v63.67a3,3,0,0,0,.86,2.07,2.92,2.92,0,0,0,2.07.86H113.55a3,3,0,0,0,2.07-.86,2.92,2.92,0,0,0,.86-2.07V49.88ZM50.43,18.54a3.2,3.2,0,0,1,0-6.4H71.92a3.2,3.2,0,1,1,0,6.4Z" fill="#808080" />
                            </svg>${wikiData.created_at}
                        </span>
                    </div>
                </div>
            </div>
        `;
}


//////////////////////////////////          Search
const searchInput = $("#search-input");
const homePage = $("#wikiContainer");
const  resultsContainer = $("#search-results-container");
const searchType = $("#search-type");

resultsContainer.css("display", "none");

searchInput.on("input", () => {
    const inputValue = searchInput.val().trim();
    const searchTypeValue = searchType.val();


    if (inputValue !== "") {
        homePage.css("display", "none");

        const url = `index.php?page=home&input_value=${inputValue}&search_type=${searchTypeValue}`;
        const params = {
            input_value: inputValue,
            search_type: searchTypeValue,
        };

        $.get(url, params)
            .done(data => {
                let results = JSON.parse(data);
                resultsContainer.html("");


                results.forEach((wikiData) => {
                    console.log(wikiData);
                    resultsContainer.html(resultsContainer.html() + `

            <div class="p-4 lg:w-fit">
                <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">${wikiData.wiki_infos.category}</h2>
                    <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">${wikiData.wiki_infos.title}</h1>
                    <p class="leading-relaxed mb-3"> ${wikiData.wiki_infos.description}</p>
                    <a href="index.php?page=wiki&wiki_id=${wikiData.wiki_infos.wiki_id}"  id="link_to_wiki" data-wiki-id="${wikiData.wiki_infos.wiki_id}" class="text-indigo-500 inline-flex items-center" >
                        Learn More
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </a>


                    <p class="leading-relaxed mb-3 mt-6 ">  <span class="font-bold">Tags: </span> ${wikiData.tags[0].tags} </p>
                    <div class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4">
                        <span class="text-gray-400 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.88 122.89" class="w-4 h-4 mr-1 text-gray-400">
                                  <path d="M81.61,4.73C81.61,2.12,84.19,0,87.38,0s5.77,2.12,5.77,4.73V25.45c0,2.61-2.58,4.73-5.77,4.73s-5.77-2.12-5.77-4.73V4.73ZM66.11,105.66c-.8,0-.8-10.1,0-10.1H81.9c.8,0,.8,10.1,0,10.1ZM15.85,68.94c-.8,0-.8-10.1,0-10.1H31.64c.8,0,.8,10.1,0,10.1Zm25.13,0c-.8,0-.8-10.1,0-10.1H56.77c.8,0,.8,10.1,0,10.1Zm25.13,0c-.8,0-.8-10.1,0-10.1H81.9c.8,0,.8,10.1,0,10.1Zm25.14-10.1H107c.8,0,.8,10.1,0,10.1H91.25c-.8,0-.8-10.1,0-10.1ZM15.85,87.3c-.8,0-.8-10.1,0-10.1H31.64c.8,0,.8,10.1,0,10.1ZM41,87.3c-.8,0-.8-10.1,0-10.1H56.77c.8,0,.8,10.1,0,10.1Zm25.13,0c-.8,0-.8-10.1,0-10.1H81.9c.8,0,.8,10.1,0,10.1Zm25.14,0c-.8,0-.8-10.1,0-10.1H107c.8,0,.8,10.1,0,10.1Zm-75.4,18.36c-.8,0-.8-10.1,0-10.1H31.64c.8,0,.8,10.1,0,10.1Zm25.13,0c-.8,0-.8-10.1,0-10.1H56.77c.8,0,.8,10.1,0,10.1ZM29.61,4.73C29.61,2.12,32.19,0,35.38,0s5.77,2.12,5.77,4.73V25.45c0,2.61-2.58,4.73-5.77,4.73s-5.77-2.12-5.77-4.73V4.73ZM6.4,43.47H116.47v-22a3,3,0,0,0-.86-2.07,2.92,2.92,0,0,0-2.07-.86H103a3.2,3.2,0,0,1,0-6.4h10.55a9.36,9.36,0,0,1,9.33,9.33v92.09a9.36,9.36,0,0,1-9.33,9.33H9.33A9.36,9.36,0,0,1,0,113.55V21.47a9.36,9.36,0,0,1,9.33-9.33H20.6a3.2,3.2,0,1,1,0,6.4H9.33a3,3,0,0,0-2.07.86,2.92,2.92,0,0,0-.86,2.07v22Zm110.08,6.41H6.4v63.67a3,3,0,0,0,.86,2.07,2.92,2.92,0,0,0,2.07.86H113.55a3,3,0,0,0,2.07-.86,2.92,2.92,0,0,0,.86-2.07V49.88ZM50.43,18.54a3.2,3.2,0,0,1,0-6.4H71.92a3.2,3.2,0,1,1,0,6.4Z" fill="#808080" />
                            </svg>${wikiData.wiki_infos.created_at}
                        </span>
                    </div>
                </div>
            </div>   `);

                });
                resultsContainer.css("display", "block");

            })
            .fail(error => {
                console.error("Error fetching search results:", error);
            });
    } else {
        resultsContainer.html("");
        homePage.css("display", "block");
    }
});

