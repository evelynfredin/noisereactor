import { Link } from '@inertiajs/inertia-react';
import clsx from 'clsx';
import React from 'react';
import { ComponentPropsWithoutRef, ElementType } from 'react';

type BaseProps<Type extends ElementType> = {
  secondary?: boolean;
  small?: boolean;
  danger?: boolean;
  dangerBtn?: boolean;
  create?: boolean;
  noButton?: boolean;
  internalAs?: Type;
};

type Props<Type extends ElementType> = BaseProps<Type> &
  Omit<ComponentPropsWithoutRef<Type>, keyof BaseProps<Type>>;

export const Button = <Type extends ElementType = 'button'>({
  secondary = false,
  small = false,
  danger = false,
  dangerBtn = false,
  create = false,
  noButton = false,
  internalAs,
  ...rest
}: Props<Type>) => {
  const Comp = internalAs ?? 'button';
  const primary = !secondary;

  return (
    <Comp
      className={clsx(
        'flex items-center whitespace-nowrap border-2 font-headings font-bold outline-none transition-colors',
        'focus:ring-1',
        danger
          ? 'border-0 ring-transparent text-red-700 text-lg hover:underline decoration-dotted px-0 py-0 rounded-none underline-offset-2'
          : 'ring-blue-700',
        {
          'pointer-events-none': rest.disabled,

          // Size
          'rounded-md px-8 py-2': !small,
          'rounded-lg px-5 py-1': small,

          // Primary - Default
          'border-gray-700 bg-gray-700 text-white text-lg justify-center hover:border-blue-600 hover:bg-blue-600 active:border-blue-600 active:bg-blue-600':
            primary &&
            !danger &&
            !dangerBtn &&
            !rest.disabled &&
            !create &&
            !noButton,

          // Secondary
          'bg-transparent text-sm capitalize text-center text-blue-200 font-bold hover:text-blue-400':
            !primary && secondary,

          // Create {resource}
          'rounded-full bg-transparent border-blue-500 text-blue-500 text-lg hover:bg-blue-500 hover:text-white justify-between gap-x-2':
            create,

          'flex items-center gap-x-2 bg-transparent border-none text-sm font-normal px-1 text-gray-400 hover:text-blue-700':
            noButton,

          'border-red-700 bg-red-700 text-white justify-center hover:border-red-600 hover:bg-red-600 active:border-red-600 active:bg-red-600':
            dangerBtn,
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
