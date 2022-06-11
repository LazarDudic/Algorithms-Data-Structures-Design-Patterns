<?php
namespace App\Forum\Domain\Services;

use Illuminate\Support\Arr;
use App\App\Domain\ServiceInterface;
use App\App\Domain\Payloads\SuccessPayload;
use App\App\Domain\Payloads\ValidationPayload;
use App\Forum\Domain\Repositories\PostRepository;
use App\Forum\Domain\Repositories\TopicRepository;

class CreateTopicService implements ServiceInterface
{
    protected $topics;
    protected $posts;

    public function __construct(TopicRepository $topics, PostRepository $posts)
    {
        $this->topics = $topics;
        $this->posts = $posts;
    }

    public function handle($data = [])
    {
        if (($validation = $this->validate($data))->fails()) {
            return new ValidationPayload($validation->getMessageBag());
        }
        $topic =  $this->topics->create(Arr::only($data, ['title']));

        $this->posts->create($topic->id, Arr::only($data, ['body']));

        $topic->load('posts');

        return new SuccessPayload($topic);
    }

    public function validate($data)
    {
        return validator($data,[
            'title' => 'required',
            'body' => 'required'
        ]);
    }
}