import { Link } from '@inertiajs/inertia-react';
import clsx from 'clsx';
import React from 'react';
import { ComponentPropsWithoutRef, ElementType } from 'react';

type BaseProps<Type extends ElementType> = {
  secondary?: boolean;
  small?: boolean;
  danger?: boolean;
  internalAs?: Type;
};

type Props<Type extends ElementType> = BaseProps<Type> &
  Omit<ComponentPropsWithoutRef<Type>, keyof BaseProps<Type>>;

export const Button = <Type extends ElementType = 'button'>({
  secondary = false,
  small = false,
  danger = false,
  internalAs,
  ...rest
}: Props<Type>) => {
  const Comp = internalAs ?? 'button';
  const primary = !secondary;

  return (
    <Comp
      className={clsx(
        'flex items-center justify-center whitespace-nowrap border-2 text-lg font-headings font-bold outline-none transition-colors',
        'focus:ring-1',
        danger ? 'ring-red-700' : 'ring-blue-700',
        {
          'pointer-events-none': rest.disabled,

          // Size
          'rounded-md px-8 py-2': !small,
          'rounded-lg px-5 py-1': small,

          // Primary - Default
          'border-gray-700 bg-gray-700 text-white hover:border-blue-600 hover:bg-blue-600 active:border-blue-600 active:bg-blue-600':
            primary && !danger && !rest.disabled,
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
