@extends('header')
@section('title', $singlePostData->title)
@section('otherConetent')
{{-- {{ var_export(session()->all(), true) }} --}}
{{-- Highlight code --}}
<link rel="stylesheet" href="{{ asset('css/singlepost.css') }}">
<style>
    #replyMessage pre {
    white-space: pre-wrap; /* Allows the text to wrap inside the <pre> tag */
    word-wrap: break-word; /* Breaks long words to prevent overflow */
    overflow-wrap: break-word; /* Ensures content doesn't overflow */
    max-width: 100%; /* Ensures the <pre> content respects the container's width */
}
</style>
    <!-- Nav Section -->
    <x-navbar></x-navbar>

    <div class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <!-- Background Image -->
        <div class="w-full h-64 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $singlePostData->featured_image ) }}');">
            <div class="w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
                <h1 class="text-4xl font-bold text-white">
                    {{ $singlePostData->title }}
                </h1>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="container mx-auto py-8 px-4 lg:flex">
            <!-- Blog Content -->
            <div class="lg:w-3/4 lg:pr-8">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-3">
                    <h2 class="text-2xl font-bold mb-4">
                        {{ $singlePostData->title }}
                    </h2>
                    <div class="prose customCss">
                        {!! $singlePostData->content !!}
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/4 lg:pl-8 mt-8 lg:mt-0">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-6">

                    <div class="flex justify-between">
                        <h3 class="text-xl font-bold mb-4">Recent Posts</h3>
                        <a href="{{ route('blog') }}" class="text-indigo-400 hover:text-indigo-600 underline  font-bold">More</a>
                    </div>
                    <ul>
                        <x-recent-post></x-recent-post>
                    </ul>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
                        <h3 class="text-xl font-bold mb-4">Suggested Posts</h3>
                    <ul>
                       <x-suggested-post></x-suggested-post>
                    </ul>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                    <div class="flex justify-between">
                        <h3 class="text-xl font-bold mb-4">Other Categories</h3>
                        <a href="{{ route('categories.index') }}" class="text-indigo-400 hover:text-indigo-600 underline  font-bold">More</a>
                    </div>
                    <ul>
                        <x-other-category></x-other-category>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <!-- Comment Section -->
    <div class="my-4 max-w-full mx-auto p-4 bg-white dark:bg-gray-800 text-gray-800 dark:text-white shadow-lg rounded-lg">
        <!-- Show All Comment -->
        @foreach ($singlePostData->comments as $comments)
            <div class="p-4 mb-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                <div class="flex items-start space-x-4">
                    <img src="https://loremflickr.com/200/200?random={{ rand(10, 200) }}" alt="User Avatar" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <!-- User Name and Timestamp -->
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-semibold text-gray-800 dark:text-white">{{ $comments->name }}</h3>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ Carbon\Carbon::parse($comments->created_at)->diffForHumans() }}</span>
                        </div>
                        <!-- Comment Text -->
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300 break-all ">
                            {{ $comments->comment }}
                        </p>
                        <!-- Like and Reply Form -->
                        <div class="mt-4 flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400 gap-7">
                            @php
                                $reaction = session()->get('commentReaction', []);
                                $action = 'like';
                                if (in_array($comments->id, $reaction)) {
                                    $action = 'dislike';
                                } else {
                                    $action = 'like';
                                }

                            @endphp
                            <x-form action="{{ route('reaction', $action) }}"
                            :fields="[
                                 [
                                    'type' => 'hidden',
                                    'name' => 'commentId',
                                    'value' => $comments->id,
                                ],
                            ]"
                            class="flex items-center space-x-1 hover:text-gray-800 dark:hover:text-white ">
                                <button type="submit">
                                    @if ($action == 'like')
                                        <i class="fas fa-heart"></i>
                                    @else
                                        <i class="fa-solid fa-heart text-red-600"></i>
                                    @endif
                                </button>
                                <span>{{ $comments->comment_like }} Likes</span>
                            </x-form>
                            <button type="button" onclick="commentReply('{{ json_encode($comments->comment) }}',{{ $comments->id }})" class="hover:text-gray-800 dark:hover:text-white">Reply</button>
                        </div>
                    </div>
                    <!-- Dropdown Menu Only Admin Or Editor -->
                    <div class="relative">
                        <button class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white" onclick="showCommentAction(event)">
                            <i class="fas fa-ellipsis-h" ></i>
                        </button>
                        <!-- Dropdown Content -->
                        <div id="showActionComment" class="hidden absolute right-0 mt-2 w-32 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg z-10">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Edit</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Remove</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Report</a>
                        </div>
                    </div>
                </div>
            </div>

            @if ($comments->replies)
                @include('components.commentReply', ['data' => $comments->replies])
            @endif

        @endforeach
        <!-- Repeat for additional comments -->
    </div>


    <div class="max-w-lg mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        @php
            $inputStyle =
                'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer';
            $labelClass =
                'peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 capitalize';
        @endphp
        <h2 class="text-xl dark:text-white py-3 font-bold text-center">Post Comment</h2>

        <!-- Reply Message Show When Reply Button hit -->
        <div id="replyMessage" class="max-w-full text-wrap relative rounded-md  bg-gray-700 p-2 my-3 ">
            <div id="commentClose" class="hidden commentClose">
                <i class=" fa-solid fa-xmark text-red-500 text-3xl  font-extrabold cursor-pointer absolute top-2 right-2 z-30 " onclick="closeComment()"></i>
            </div>
        </div>

        <x-form id="actionChange" action="{{ route('postComment',  $singlePostData->id) }}" animationBtn="Submit" method="POST"
            :fields="[
                [
                    'type' => 'text',
                    'name' => 'name',
                    'id' => 'name',
                    'placeholder' => '',
                    'label' => [
                        'name' => 'Enter Name*',
                        'class' => $labelClass,
                    ],
                    'class' => $inputStyle,
                ],
                [
                    'type' => 'text',
                    'name' => 'email',
                    'id' => 'email',
                    'placeholder' => '',
                    'label' => [
                        'name' => 'Enter Email*',
                        'class' => $labelClass,
                    ],
                    'class' => $inputStyle,
                ],
                [
                    'type' => 'text',
                    'name' => 'website',
                    'id' => 'website',
                    'placeholder' => '',
                    'label' => [
                        'name' => 'Enter Website',
                        'class' => $labelClass,
                    ],
                    'class' => $inputStyle,
                ],
            ]" class="max-w-full">

            <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
            <textarea name="comment" id="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your Reply here..."></textarea>
        </x-form>
    </div>


    <!-- Footer Section -->
    <x-footer></x-footer>


    {{-- Highlight Code show  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

    <script>
      document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((block) => {
            hljs.highlightElement(block);
            });
      });

    function commentReply(comment,commentId){
        let replyAction = document.querySelector('input[name="reply"]');
        const actionChange = document.getElementById('actionChange');

        // reply Id
        if (replyAction) {
            replyAction.value = commentId;
        } else {
            actionChange.innerHTML += '<input type="hidden" value='+commentId+' name="reply">';
        }

        // Close Message Icon
        const commentClose = document.querySelector('#commentClose');
        commentClose.classList.remove('hidden')

        // Reply Message
        const replyMessage = document.getElementById('replyMessage');
        if (replyMessage) {
            const newCommentHTML = `<div class="dark:text-white" data-comment-id="1">${comment}</div>`;
            const existingComment = replyMessage.querySelector(`[data-comment-id="1"]`);

            if (existingComment) {
                existingComment.innerHTML = comment;
            } else {
                replyMessage.innerHTML += newCommentHTML;
            }
        }
    }

    // Close Comment
    function closeComment(){
        // Icon hidden
        const commentClose = document.getElementById('commentClose');
        commentClose.classList.add('hidden');

        // form Input Delete
        const replyAction = document.querySelector('input[name="reply"]');
        if(replyAction){
            replyAction.remove();
        }

        // Comment div delete
        const replyMessage = document.querySelector(`[data-comment-id="1"]`);
        if(replyMessage){
            replyMessage.remove();
        }
    }

    // Admin Comment Action
    function showCommentAction(event){
        const button = event.currentTarget;
        const dropdown = button.nextElementSibling;
        dropdown.classList.toggle('hidden');
    }

    </script>
@endsection


