@foreach ($data as $comments)
@php
   $replyLabel = $comments->replies ? $replyLabel + 3 : $replyLabel;
@endphp
<div class="p-4 mb-4 bg-gray-100 dark:bg-gray-700 rounded-lg ml-{{ $replyLabel }}">
        <div class="flex items-start space-x-4">
            <img src="https://loremflickr.com/200/200?random={{ rand(10, 200) }}" alt="User Avatar" class="w-10 h-10 rounded-full">
            <div class="flex-1">
                <!-- User Name and Timestamp -->
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-semibold text-gray-800 dark:text-white">{{ $comments->name }}</h3>
                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ Carbon\Carbon::parse($comments->created_at)->diffForHumans() }}</span>
                </div>
                <!-- Comment Text -->
                @if (!is_null($comments->status))
                    <p class="text-red-500 font-bold text-xl capitalize">Comment {{ $comments->status }}</p>
                @else
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-300 break-all "> {{ $comments->comment }} </p>
                @endif
                <!-- Like and Reply Form -->
                <div class="mt-4 flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
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
                    class="flex items-center space-x-1 hover:text-gray-800 dark:hover:text-white">
                        <button type="submit" class="inline-flex gap-2">
                            @if ($action == 'like')
                                <i class="fas fa-heart"></i>
                            @else
                                <i class="fa-solid fa-heart text-red-600"></i>
                            @endif
                            <span>{{ $comments->comment_like }}</span>
                        </button>
                    </x-form>
                    <button type="button" onclick="commentReply('{{ json_encode($comments->comment) }}',{{ $comments->id }})" class="hover:text-gray-800 dark:hover:text-white">Reply</button>
                </div>
            </div>
            <!-- Dropdown Menu Only Admin Or Editor -->
            @if (Auth::user())
                <div class="relative">
                    <button class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white" onclick="showCommentAction(event)">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <!-- Dropdown Content -->
                    <div id="showActionComment" class="hidden absolute right-0 mt-2 w-32 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg z-10">
                        @canany(['checkPermission', 'AdminAndEditor'], $comments->user_id)
                            <a href="{{ route('comment.edit', $comments->id) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Edit</a>
                            <x-form action="{{ route('comment.destroy', $comments->id) }}" method="DELETE">
                                <button type="submit" class="block w-full py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Remove</button>
                            </x-form>
                        @endcanany
                        @canany('administrator')
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Report</a>
                        @endcanany
                    </div>
                </div>
            @endif
        </div>
</div>

@if ($comments->replies)
    @include('components.commentReply', ['data' => $comments->replies, 'replyLabel' => $replyLabel])
@endif

@endforeach

<script>
     // Admin Comment Action
     function showCommentAction(event){
        const button = event.currentTarget;
        const dropdown = button.nextElementSibling;
        dropdown.classList.toggle('hidden');
    }
</script>
