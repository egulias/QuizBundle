<?php

namespace Egulias\QuizBundle\Event;

/**
 * QuizEvents
 *
 * @package    EguliasQuizBundle
 * @subpackage Event
 * @author     Eduardo Gulias Davis <me@egulias.com>
 */
final class QuizEvents
{
    /**
     *  The egulias.quiz.response event is thrown before a Quiz being answered is saved.
     *
     *  The event listener recieves an Egulias\QuizBundle\Event\FilterQuizEvent
     *
     *  @var
     */
    const onQuizResponse = 'egulias.quiz.response';

}
