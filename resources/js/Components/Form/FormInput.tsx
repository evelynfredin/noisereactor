import React, { ChangeEventHandler } from 'react';

type Props = {
  type: string;
  name: string;
  onChange: ChangeEventHandler<HTMLInputElement>;
  value?: string | number | readonly string[] | undefined;
};

const FormInput = ({ type, name, onChange, value }: Props) => {
  return (
    <input
      className="bg-gray-50 border-gray-200 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500"
      type={type}
      name={name}
      onChange={onChange}
      value={value}
    />
  );
};

export default FormInput;
