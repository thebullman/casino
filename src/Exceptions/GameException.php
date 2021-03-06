<?php

namespace Cysha\Casino\Exceptions;

use Cysha\Casino\Game\Client;
use Cysha\Casino\Game\Contracts\Game;
use Exception;

class GameException extends Exception
{
    /**
     * @param string $message
     *
     * @return static
     */
    public static function invalidId($message = null)
    {
        $defaultMessage = 'ID passed to the Game must be a valid UUID';
        $message = is_null($message) ? $defaultMessage : $message;

        return new static($message);
    }

    /**
     * @param Client $player
     * @param Game   $game
     * @param string $message
     *
     * @return static
     */
    public static function alreadyRegistered(Client $player, Game $game, $message = null)
    {
        $defaultMessage = sprintf('%s is already registered to game: "%s"', $player, $game);
        $message = is_null($message) ? $defaultMessage : $message;

        return new static($message);
    }

    /**
     * @param Client $player
     * @param Game   $game
     * @param string $message
     *
     * @return static
     */
    public static function notRegistered(Client $player, Game $game, $message = null)
    {
        $defaultMessage = sprintf('%s is not registered to game: "%s"', $player, $game);
        $message = is_null($message) ? $defaultMessage : $message;

        return new static($message);
    }

    /**
     * @param Client $player
     * @param Game   $game
     * @param string $message
     *
     * @return static
     */
    public static function insufficientFunds(Client $player, Game $game, $message = null)
    {
        $defaultMessage = sprintf('%s doesnt have sufficient funds to register for game: "%s"', $player, $game);
        $message = is_null($message) ? $defaultMessage : $message;

        return new static($message);
    }
}
