<?php
require_once (__DIR__."/../Controller/comment.php");

$id = $_GET['postId'];

$comment = getComments($id);

$commentHtml = '';
if (isset($comment) and is_array($comment)) {
    foreach($comment as $c) {
        $replyHtml = '';
        foreach ($c['child'] as $child) {
            $replyHtml .= <<<REPLY
            <article class="media reply-comment">
                <div class="media-content" id="content-{$child['commentID']}">
                    <div class="content">
                        <p>
                            <strong>{$child['username']}</strong>
                            <br/>
                            {$child['body']}
                            <br/>
                        </p>
                        <p class="right-position">
                            <small >{$child['updateAt']}</small>
                            <small><a href="javascript:void(0);" onclick="deleteComment({$child['commentID']})">삭제</a></small>
                        </p>
                    </div>
                </div>
            </article>
            REPLY;
        }

        $commentHtml .= <<<HTMLCODE
            <article class="media">
                <div class="media-content" id="content-{$c['commentID']}">
                    <div class="content">
                        <p>
                            <strong>{$c['username']}</strong>
                            <br/>
                            {$c['body']}
                            <br/>
                        </p>
                        <p class="right-position">
                            <small><a href="javascript:void(0);" onclick="reply({$c['commentID']})">reply</a></small>
                            <small>{$c['updateAt']}</small>
                            <small><a href="javascript:void(0);" onclick="deleteComment({$c['commentID']})">삭제</a></small>
                        </p>
                    </div>
                    {$replyHtml}
                </div>
            </article>
            HTMLCODE;
    }
}

echo $commentHtml;