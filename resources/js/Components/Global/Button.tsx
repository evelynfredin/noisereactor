import { Link } from '@inertiajs/inertia-react';
import clsx from 'clsx';
import React from 'react';
import { ComponentPropsWithoutRef, ElementType } from 'react';

type BaseProps<Type extends ElementType> = {
  secondary?: boolean;
  small?: boolean;
  danger?: boolean;
  create?: boolean;
  internalAs?: Type;
};

type Props<Type extends ElementType> = BaseProps<Type> &
  Omit<ComponentPropsWithoutRef<Type>, keyof BaseProps<Type>>;

export const Button = <Type extends ElementType = 'button'>({
  secondary = false,
  small = false,
  danger = false,
  create = false,
  internalAs,
  ...rest
}: Props<Type>) => {
  const Comp = internalAs ?? 'button';
  const primary = !secondary;

  return (
    <Comp
      className={clsx(
        'flex items-center whitespace-nowrap border-2 text-lg font-headings font-bold outline-none transition-colors',
        'focus:ring-1',
        danger ? 'ring-red-700' : 'ring-blue-700',
        {
          'pointer-events-none': rest.disabled,

          // Size
          'rounded-md px-8 py-2': !small,
          'rounded-lg px-5 py-1': small,

          // Primary - Default
          'border-gray-700 bg-gray-700 text-white justify-center hover:border-blue-600 hover:bg-blue-600 active:border-blue-600 active:bg-blue-600':
            primary && !danger && !rest.disabled && !create,

          // Secondary
          'bg-transparent text-sm capitalize text-center  text-blue-200 font-bold hover:text-blue-400':
            !primary && secondary,

          // Create {resource}
          'rounded-full bg-transparent border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white smoothify justify-between gap-x-2':
            create,
        }
      )}
      {...rest}
    />
  );
};

export const LinkButton = ({ href, ...rest }: Props<typeof Link>) => {
  return <Button internalAs={Link} href={href} {...rest} />;
};

export const ExternalLinkButton = ({ href, children, ...rest }: Props<'a'>) => {
  return (
    <Button internalAs="a" href={href} {...rest}>
      {children}
    </Button>
  );
};
