import React, { ChangeEventHandler } from 'react';

type Props = {
  name: string;
  onChange: ChangeEventHandler<HTMLTextAreaElement>;
  value?: string | number | readonly string[] | undefined;
};

const FormTextArea = ({ name, value, onChange }: Props) => {
  return (
    <textarea
      className="bg-gray-50 border-gray-200 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500"
      name={name}
      onChange={onChange}
      value={value}
      cols={20}
      rows={10}
    ></textarea>
  );
};

export default FormTextArea;
