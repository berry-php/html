<?php declare(strict_types=1);

namespace Berry;

interface Renderable
{
    /**
     * Render the element into a string buffer
     *
     * @param string[] $buffer
     */
    public function renderInto(array &$buffer): void;

    /**
     * Returns the string representation of the element
     */
    public function toString(): string;

    /**
     * Returns an array representation of the element containing
     * - Class Name
     * - List of attributes
     * - List of children
     *
     * @return array{
     *      0: class-string<static>,
     *      1: array<string, string|int|float|bool>,
     *      2: array<array{
     *          0: string,
     *          1: array<string, string|int|float|bool>,
     *          2: array<mixed>
     *      }>
     * }
     */
    public function toArray(): array;
}
