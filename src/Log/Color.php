<?php namespace Reativ\Verb\Log;

class Color {
    public const BOLD = "\033[1m%s\033[0m";
    public const DARK = "\033[2m%s\033[0m";
    public const ITALIC = "\033[3m%s\033[0m";
    public const UNDERLINE = "\033[4m%s\033[0m";
    public const BLINK = "\033[5m%s\033[0m";
    public const REVERSE = "\033[7m%s\033[0m";
    public const CONCEALED = "\033[8m%s\033[0m";

    public const BLACK = "\033[30m%s\033[0m";
    public const RED = "\033[31m%s\033[0m";
    public const GREEN = "\033[32m%s\033[0m";
    public const YELLOW = "\033[33m%s\033[0m";
    public const BLUE = "\033[34m%s\033[0m";
    public const MAGENTA = "\033[35m%s\033[0m";
    public const CYAN = "\033[36m%s\033[0m";
    public const WHITE = "\033[37m%s\033[0m";

    public const BG_BLACK = "\033[40m%s\033[0m";
    public const BG_RED = "\033[41m%s\033[0m";
    public const BG_GREEN = "\033[42m%s\033[0m";
    public const BG_YELLOW = "\033[43m%s\033[0m";
    public const BG_BLUE = "\033[44m%s\033[0m";
    public const BG_MAGENTA = "\033[45m%s\033[0m";
    public const BG_CYAN = "\033[46m%s\033[0m";
    public const BG_WHITE = "\033[47m%s\033[0m";
}
